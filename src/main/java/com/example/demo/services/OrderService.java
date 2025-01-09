package com.example.demo.services;

import java.util.Date;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

import org.springframework.stereotype.Service;

import com.example.demo.models.Order;
import com.example.demo.models.User;
import com.example.demo.repositories.OrderRepository;

@Service
public class OrderService {
    private final OrderRepository orderRepository;

    public OrderService(OrderRepository orderRepository) {
        this.orderRepository = orderRepository;
    }

    public List<Order> getOrdersByUserId(String userId) {
        return orderRepository.findByUserId(userId);
    }
    

    public List<Order> getOrdersByUserIdExcludingStatus(String userId, String excludedStatus) {
        return orderRepository.findByUserIdAndStatusNot(userId, excludedStatus);
    }    
    
    public List<Order> getOrdersByUserIdAndStatus(String userId, String status) {
        return orderRepository.findByUserIdAndStatus(userId, status);
    }

    // Create order with Pending status
    public String createOrder(User user, List<Map<String, Object>> cartItems, double totalPrice) {
        Order order = new Order();
        order.setUserId(user.getId());
        order.setContactNumber(user.getPhone()); // Assuming `getPhone` returns the user's contact number
        order.setTotalPrice(totalPrice);
        order.setTimeStamp(new Date());
        order.setStatus("Pending");

        // Map cart items to `Order.OrderItem`
        List<Order.OrderItem> orderItems = cartItems.stream().map(item -> {
            Order.OrderItem orderItem = new Order.OrderItem();
            orderItem.setMenuId((String) item.get("id"));
            orderItem.setMenuName((String) item.get("itemName"));
            orderItem.setPrice(Double.parseDouble(item.get("price").toString()));
            orderItem.setQuantity(Integer.parseInt(item.get("quantity").toString()));
            return orderItem;
        }).collect(Collectors.toList());

        order.setCartItems(orderItems);

        // Save the order to the database
        Order savedOrder = orderRepository.save(order);
        return savedOrder.getOrderId();
    }

    public void deleteOrderById(String orderId) {
        orderRepository.deleteById(orderId);
    }
    
    public Order getOrderById(String orderId) {
        return orderRepository.findById(orderId).orElse(null);
    }

    // Confirm order status manually if needed
    public void confirmOrder(String orderId) {
        Order order = getOrderById(orderId);
        if (order != null) {
            order.setStatus("Confirmed");
            orderRepository.save(order);
        }
    }
    
    public void saveOrder(Order order) {
        orderRepository.save(order);
    }
}
