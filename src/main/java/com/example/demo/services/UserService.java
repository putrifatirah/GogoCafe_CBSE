package com.example.demo.services;

// import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.models.User;
import com.example.demo.repositories.UserRepository;

@Service
public class UserService {

    private final UserRepository userRepository;

    public UserService(UserRepository userRepository) {
        this.userRepository = userRepository;
    }

    public void saveUser(User user) {
        if (user.getUsername() == null || user.getPassword() == null || user.getEmail() == null) {
            throw new IllegalArgumentException("Required fields are missing.");
        }
        userRepository.save(user);
    }

    // public void updateUser(User user) {
    //     userRepository.save(user); // Save the updated user in the database
    // }
    public void updateUser(User user) {
        if (user.getId() == null) {
            throw new IllegalArgumentException("User ID is required for an update.");
        }
        userRepository.save(user);
    }
    

    public void deleteUser(String userId) {
        userRepository.deleteById(userId); // Delete user by id
    }
    
    public User findByEmailAndPassword(String email, String password) {
        User user = userRepository.findByEmail(email);
        if (user != null && user.getPassword().equals(password)) {
            return user;
        }
        return null; // Authentication failed
    }    
    
    public User getUserById(String userId) {
        return userRepository.findById(userId).orElse(null);
    }

}
