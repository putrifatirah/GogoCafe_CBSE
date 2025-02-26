package com.example.demo.models;

import java.util.UUID;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "user")
public class User {
    @Id
    private String id;
    private String username;          // Unique user ID
    private String password;    // Encrypted password
    private String email;
    private String phone; 
    // private Date createdAt;
    // private Date updatedAt;

    // Generate a random ID if not already set
    public User() {
        this.id = UUID.randomUUID().toString();
    }

    // Getters and setters
    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    // Getters and Setters
    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }
    
    // public Date getCreatedAt() {
    //     return createdAt;
    // }

    // public void setCreatedAt(Date createdAt) {
    //     this.createdAt = createdAt;
    // }

    // public Date getUpdatedAt() {
    //     return updatedAt;
    // }

    // public void setUpdatedAt(Date updatedAt) {
    //     this.updatedAt = updatedAt;
    // }
}
