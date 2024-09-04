import React from 'react'
import './About.css'

function About() {
  return (
    <div className="about-container">
      <header className="about-header">
        <h1>About Us</h1>
      </header>
      <main className="about-content">
        <h2>Welcome to the Book List App</h2>
        <p>
          The Book List App is designed to help you manage your personal book collection with ease. 
          Whether you’re an avid reader or just getting started with book collecting, this app 
          offers a straightforward way to keep track of your books, including adding, editing, 
          and deleting book details.
        </p>
        <h3>Our Mission</h3>
        <p>
          Our mission is to provide a simple yet powerful tool for book enthusiasts to organize 
          and manage their libraries. We aim to enhance the reading experience by making book 
          management seamless and efficient.
        </p>
        <h3>Contact Us</h3>
        <p>
          If you have any questions or feedback, feel free to reach out to us at: 
          <a href="mailto:support@booklistapp.com">support@booklistapp.com</a>
        </p>
      </main>
      <footer className="about-footer">
        <p>&copy; 2024 Book List App. All rights reserved.</p>
      </footer>
    </div>
  )
}

export default About
