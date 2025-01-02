package com.example.demo.controllers;

import java.util.List;
import java.util.Map;

import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.models.Order;
import com.example.demo.models.User;
import com.example.demo.services.OrderService;

import jakarta.servlet.http.HttpSession;

@Controller
@RequestMapping("/order")
public class OrderController {

    private final OrderService orderService;

    public OrderController(OrderService orderService) {
        this.orderService = orderService;
    }

    @PostMapping("/checkout")
    @ResponseBody
    public ResponseEntity<Map<String, Object>> checkout(@RequestBody Map<String, Object> requestData, HttpSession session) {
    User loggedInUser = (User) session.getAttribute("loggedInUser");
    if (loggedInUser == null) {
        return ResponseEntity.status(401).body(Map.of("success", false, "message", "Unauthorized"));
    }

    try {
        // Extract data from the request payload
        @SuppressWarnings("unchecked")
        List<Map<String, Object>> cartItems = (List<Map<String, Object>>) requestData.get("cartItems");
        double totalPrice = Double.parseDouble(requestData.get("totalPrice").toString());

        // Create the order
        String orderId = orderService.createOrder(loggedInUser, cartItems, totalPrice);
        return ResponseEntity.ok(Map.of("success", true, "orderId", orderId));
    } catch (Exception e) {
        // Log the error for debugging
        e.printStackTrace();
        return ResponseEntity.status(500).body(Map.of("success", false, "message", e.getMessage()));
    }
}

    @GetMapping("/receipt")
    public String receipt(@RequestParam("orderId") String orderId, Model model) {
        Order order = orderService.getOrderById(orderId);
        if (order == null) {
            return "error"; // Return an error page if the order is not found
        }
        model.addAttribute("order", order);
        return "receipt"; // Matches `receipt.html` in the templates folder
    }

    @PostMapping("/confirm")
    public String confirmOrder(@RequestParam("orderId") String orderId, HttpSession session) {
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser == null) {
            return "redirect:/login";
        }

        // The order status remains "Pending" by default; no status change occurs here.
        Order order = orderService.getOrderById(orderId);
        if (order != null && "Pending".equals(order.getStatus())) {
            // Optionally re-save the order to ensure it's in the database with "Pending" status
            orderService.saveOrder(order);
        }

        return "redirect:/home"; // Redirect after successful submission
    }
}
