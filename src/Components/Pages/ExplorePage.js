import React, { useState, useEffect } from 'react';
import './ExplorePage.css'; // Import the CSS file for styling

const ExplorePage = () => {
  // Sample state for book data
  const [books, setBooks] = useState([]);

  // Simulate fetching books data
  useEffect(() => {
    // Simulating fetching book data
    setBooks([
      { id: 1, title: 'The Great Gatsby', author: 'F. Scott Fitzgerald', cover: 'cover1.jpg' },
      { id: 2, title: '1984', author: 'George Orwell', cover: 'cover2.jpg' },
      { id: 3, title: 'To Kill a Mockingbird', author: 'Harper Lee', cover: 'cover3.jpg' }
      // Add more books as needed
    ]);
  }, []);

  return (
    <div className="explore-container">
      <header className="explore-header">
        <h1>Explore Our Collection</h1>
        <p>Discover a world of books at your fingertips</p>
      </header>
      <section className="books-list">
        {books.length > 0 ? (
          books.map(book => (
            <div key={book.id} className="book-card">
              <img src={`path/to/covers/${book.cover}`} alt={book.title} className="book-cover"/>
              <div className="book-details">
                <h2>{book.title}</h2>
                <p>{book.author}</p>
              </div>
            </div>
          ))
        ) : (
          <p>No books available.</p>
        )}
      </section>
    </div>
  );
};

export default ExplorePage;
