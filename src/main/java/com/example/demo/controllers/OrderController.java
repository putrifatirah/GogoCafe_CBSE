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
@RequestMapping("/orders")
public class OrderController {

    private final OrderService orderService;

    public OrderController(OrderService orderService) {
        this.orderService = orderService;
    }

    @GetMapping
    public String listOrders(Model model, HttpSession session) {
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser == null) {
            return "redirect:/login"; // Redirect to login if not logged in
        }

        List<Order> orders = orderService.getOrdersByUserId(loggedInUser.getId());
        model.addAttribute("orders", orders);
        model.addAttribute("status", "All");
        return "orders"; // Matches `orders.html` in the templates folder
    }

    @GetMapping("/checkOrder")
    public String checkOrder(@RequestParam("orderId") String orderId, Model model) {
        Order order = orderService.getOrderById(orderId);
        if (order == null) {
            return "error"; // Handle case if order is not found
        }
        model.addAttribute("order", order);
        return "checkOrder"; // Render checkOrder.html
    }
    @PostMapping("/cancel")
    public String cancelOrder(@RequestParam("orderId") String orderId, HttpSession session) {
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser == null) {
            return "redirect:/login";
        }

        Order order = orderService.getOrderById(orderId);
        if (order != null && "Pending".equals(order.getStatus())) {
            orderService.deleteOrderById(orderId); // Delete the order from the database
        }

        return "redirect:/orders"; // Redirect back to the orders page
    }
    @GetMapping("/active")
    public String activeOrders(Model model, HttpSession session) {
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser == null) {
            return "redirect:/login";
        }

        // Fetch orders where status is NOT "Completed"
        List<Order> orders = orderService.getOrdersByUserIdExcludingStatus(loggedInUser.getId(), "Completed");
        model.addAttribute("orders", orders);
        return "active";
    }

    @GetMapping("/past")
    public String pastOrders(Model model, HttpSession session) {
        User loggedInUser = (User) session.getAttribute("loggedInUser");
        if (loggedInUser == null) {
            return "redirect:/login";
        }

        List<Order> orders = orderService.getOrdersByUserIdAndStatus(loggedInUser.getId(), "Completed");
        model.addAttribute("orders", orders);
        model.addAttribute("status", "Completed");
        return "past";
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
            model.addAttribute("errorMessage", "Order not found.");
            return "error"; // Matches `error.html` in the templates folder
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

        Order order = orderService.getOrderById(orderId);
        if (order != null && "Pending".equals(order.getStatus())) {
            order.setStatus("Confirmed"); // Update status to "Confirmed"
            orderService.saveOrder(order);
        }

        return "redirect:/orders"; // Redirect to the orders page after confirmation
    };
}