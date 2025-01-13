package com.example.demo.controllers;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import com.example.demo.models.Promotion;
import com.example.demo.services.PromotionService;

@Controller
public class HomeController {

    @Autowired
    private PromotionService promotionService;

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
}
