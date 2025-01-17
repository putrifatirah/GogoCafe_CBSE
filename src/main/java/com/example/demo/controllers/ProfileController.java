package com.example.demo.controllers;

import java.util.HashMap;
import java.util.Map;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.models.User;
import com.example.demo.services.UserService;

import jakarta.servlet.http.HttpSession;

@Controller
public class ProfileController {

    private final UserService userService;

    public ProfileController(UserService userService) {
        this.userService = userService;
    }

    @GetMapping("/edit")
    public String editProfileForm(HttpSession session, Model model) {
        User user = (User) session.getAttribute("loggedInUser");
        if (user == null) {
            return "redirect:/home"; // Redirect to login if user not logged in
        }
        model.addAttribute("user", user); // Add user to the model
        return "edit"; // Returns the edit-profile.html template
    }

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

    @PostMapping("/delete")
    public String deleteAccount(HttpSession session) {
        // Get the logged-in user from the session
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser != null) {
            // Delete user from the database
            userService.deleteUser(loggedInUser.getId());
            // Invalidate session to log out the user
            session.invalidate();
        }
        // Redirect to the home page
        return "redirect:/home";
    }

    @GetMapping("/profile")
    public String showProfile(Model model, HttpSession session) {
        User user = (User) session.getAttribute("loggedInUser");
        if (user == null) {
            return "redirect:/home"; // Redirect to login if not authenticated
        }
        model.addAttribute("user", user);
        return "profile"; // Refers to profile.html in src/main/resources/templates
    }
    
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


}
