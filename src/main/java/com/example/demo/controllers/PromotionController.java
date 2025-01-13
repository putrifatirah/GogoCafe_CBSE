package com.example.demo.controllers;

import com.example.demo.models.Promotion;
import com.example.demo.services.PromotionService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;

@Controller
public class PromotionController {

    @Autowired
    private PromotionService promotionService;

    @GetMapping("/promotion/{id}")
    public String promotionDetail(@PathVariable String id, Model model) {
        Promotion promotion = promotionService.getPromotionById(id);
        model.addAttribute("promotion", promotion);
        return "promotionDetail"; // promotionDetail.html
    }

    @GetMapping("/promopostpage/{id}")
    public String promoPostPage(@PathVariable String id, Model model) {
        // Fetch the promotion details by ID
        Promotion promotion = promotionService.getPromotionById(id);
        model.addAttribute("promotion", promotion);

        // Return the promopostpage.html template
        return "promopostpage"; // This should match the name of your HTML file
    }
}
