package com.example.demo.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

import com.example.demo.models.User;
import com.example.demo.services.UserService;

import jakarta.servlet.http.HttpSession;

@Controller
public class LoginController {

    private final UserService userService;

    public LoginController(UserService userService) {
        this.userService = userService;
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
}
