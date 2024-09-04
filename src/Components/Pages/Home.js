import React from 'react';
import './Home.css'; // Import the CSS file for styling

const Home = () => {
  return (
    <div className="home-container">
      <header className="home-header">
        <h1>Welcome to E-Book Library</h1>
        <p>Your gateway to a world of digital books</p>
        <button className="btn explore-btn">Explore Now</button>
      </header>
      <section className="features-section">
        <div className="feature">
          <h2>Wide Collection</h2>
          <p>Browse through a vast collection of books across various genres and categories.</p>
        </div>
        <div className="feature">
          <h2>Personalized Recommendations</h2>
          <p>Get book recommendations tailored to your interests and reading history.</p>
        </div>
        <div className="feature">
          <h2>Read Anytime, Anywhere</h2>
          <p>Access your favorite books on any device, whether you’re at home or on the go.</p>
        </div>
      </section>
      <footer className="home-footer">
        <p>&copy; 2024 E-Book Library. All rights reserved.</p>
      </footer>
    </div>
  );
};

export default Home;
