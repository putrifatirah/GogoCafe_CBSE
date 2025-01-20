package com.example.demo.controllers;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.models.Promotion;
import com.example.demo.models.User;
import com.example.demo.services.PromotionService;
import com.example.demo.services.UserService;

import jakarta.servlet.http.HttpSession;


@Controller
public class UserController {

    @Autowired
    private PromotionService promotionService;

    private final UserService userService;

    // Constructor-based injection for UserService
    public UserController(UserService userService) {
        this.userService = userService;
    }

    @GetMapping("/home")
    public String homePage(Model model) {
        // Fetch team members
        List<TeamMember> teamMembers = new ArrayList<>();
        teamMembers.add(new TeamMember("Fatirah", "Founder", "images/fatirah.png"));
        teamMembers.add(new TeamMember("Syifaa", "Manager", "images/syifaa.png"));
        teamMembers.add(new TeamMember("Aina", "Barista", "images/aina.png"));
        teamMembers.add(new TeamMember("Umi Arifah", "Manager", "images/mipah.png"));
        teamMembers.add(new TeamMember("Rafiuddin", "Barista", "images/rafiy.png"));
        teamMembers.add(new TeamMember("Visa", "Barista", "images/visa.png"));
        model.addAttribute("teamMembers", teamMembers);
        // Fetch promotions
        List<Promotion> promotions = promotionService.getActivePromotions();
        model.addAttribute("promotions", promotions);

        return "home"; // Name of the HTML file (home.html)
    }
    
    // **Profile Page**
    @GetMapping("/profile")
    public String showProfile(Model model, HttpSession session) {
        User user = (User) session.getAttribute("loggedInUser");
        if (user == null) {
            return "redirect:/home"; // Redirect to login if not authenticated
        }
        model.addAttribute("user", user);
        return "profile"; // Refers to profile.html in src/main/resources/templates
    }

    // **Edit Profile Form**
    @GetMapping("/edit")
    public String editProfileForm(HttpSession session, Model model) {
        User user = (User) session.getAttribute("loggedInUser");
        if (user == null) {
            return "redirect:/home"; // Redirect to login if user not logged in
        }
        model.addAttribute("user", user); // Add user to the model
        return "edit"; // Returns the edit-profile.html template
    }

    // **Save Updated Profile**
    @PostMapping("/edit")
    public String saveUpdatedProfile(@ModelAttribute User user, HttpSession session) {
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser == null) {
            return "redirect:/home"; // Redirect if user is not logged in
        }

        // Preserve the existing user's ID
        user.setId(loggedInUser.getId());

        // Update user details
        loggedInUser.setUsername(user.getUsername());
        loggedInUser.setEmail(user.getEmail());
        loggedInUser.setPhone(user.getPhone());

        // Update the user in the database
        userService.updateUser(loggedInUser);

        // Update the session with the modified user
        session.setAttribute("loggedInUser", loggedInUser);

        return "redirect:/profile"; // Redirect to the profile page
    }

    // **Delete Account**
    @PostMapping("/delete")
    public String deleteAccount(HttpSession session) {
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser != null) {
            // Delete user from the database
            userService.deleteUser(loggedInUser.getId());
            // Invalidate session to log out the user
            session.invalidate();
        }
        return "redirect:/home"; // Redirect to home page
    }
    // **Change Password**
    @PostMapping("/change-password")
    @ResponseBody
    public Map<String, Object> changePassword(@RequestBody Map<String, String> passwords, HttpSession session) {
        Map<String, Object> response = new HashMap<>();
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser == null) {
            response.put("success", false);
            response.put("message", "User not logged in.");
            return response;
        }
        String currentPassword = passwords.get("currentPassword");
        String newPassword = passwords.get("newPassword");
        // Verify the current password
        if (!loggedInUser.getPassword().equals(currentPassword)) {
            response.put("success", false);
            response.put("message", "Incorrect current password.");
            return response;
        }
        // Update the password
        loggedInUser.setPassword(newPassword);
        userService.updateUser(loggedInUser); // Save the updated user
        response.put("success", true);
        return response;
    }
    public static class TeamMember {
        private String name;
        private String position;
        private String image;
        public TeamMember(String name, String position, String image) {
            this.name = name;
            this.position = position;
            this.image = image;
        }
        public String getName() {
            return name;
        }
        public String getPosition() {
            return position;
        }
        public String getImage() {
            return image;
        }
    }

    // Show login page
    @GetMapping("/login")
    public String showLoginPage(Model model) {
        model.addAttribute("user", new User());
        return "home"; // Refers to the login.html template
    }

    @PostMapping("/login")
    public String loginUser(@ModelAttribute User user, HttpSession session, Model model) {
        User loggedInUser = userService.findByEmailAndPassword(user.getEmail(), user.getPassword());
        if (loggedInUser != null) {
            session.setAttribute("loggedInUser", loggedInUser);
            return "redirect:/home"; // Redirect to the home page
        } else {
            model.addAttribute("error", "Invalid email or password. Please try again.");
            return "home"; // Reload the home page with the login modal still open
        }
    }

    // Handle logout
    @GetMapping("/logout")
    public String logoutUser(HttpSession session) {
        session.invalidate(); // Clear the session
        return "redirect:/home"; // Redirect to login page
    }

    @GetMapping("/signup")
    public String showSignupPage(Model model) {
        // Add a new user object to the model for form binding
        model.addAttribute("user", new User());
        return "signup"; // This assumes a Thymeleaf template named signup.html exists
    }

    @PostMapping("/signup")
    public String registerUser(@ModelAttribute User user, HttpSession session, Model model) {
        try {
            // Save the user to the database
            userService.saveUser(user);

            // Store the user in the session
            session.setAttribute("loggedInUser", user);

            // Redirect to the home page
            return "redirect:/home";
        } catch (Exception e) {
            model.addAttribute("error", "Registration failed. Please try again.");
            // If an error occurs, stay on the signup page
            return "signup";
        }
    }
}
