package com.example.demo.controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

import com.example.demo.models.User;
import com.example.demo.services.UserService;

import jakarta.servlet.http.HttpSession;

@Controller
public class SignupController {

    private final UserService userService;

    @GetMapping("/signup")
    public String showSignupPage(Model model) {
        // Add a new user object to the model for form binding
        model.addAttribute("user", new User());
        return "signup"; // This assumes a Thymeleaf template named signup.html exists
    }
  
    public SignupController(UserService userService) {
        this.userService = userService;
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
