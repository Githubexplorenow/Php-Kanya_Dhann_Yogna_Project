import "./Books.css";
import React, { useEffect, useState } from "react";
 import { ViewList } from "./ViewList ";
 


const getDatafromLS = () => {
  const data = localStorage.getItem("books");
  return data ? JSON.parse(data) : [];
};

const Books = () => {
  const [books, setBooks] = useState(getDatafromLS());
  const [title, setTitle] = useState("");
  const [author, setAuthor] = useState("");
  const [isbn, setIsbn] = useState("");
  const [editingBook, setEditingBook] = useState(null);

  const handleAddOrUpdateBookSubmit = (e) => {
    e.preventDefault();
    if (editingBook) {
      const updatedBooks = books.map((book) =>
        book.isbn === editingBook.isbn ? { title, author, isbn } : book
      );
      setBooks(updatedBooks);
      setEditingBook(null);
    } else {
      let book = { title, author, isbn };
      setBooks([...books, book]);
    }
    setTitle("");
    setAuthor("");
    setIsbn("");
  };

  const deleteBook = (isbn) => {
    const filteredBooks = books.filter((book) => book.isbn !== isbn);
    setBooks(filteredBooks);
  };

  const editBook = (book) => {
    setTitle(book.title);
    setAuthor(book.author);
    setIsbn(book.isbn);
    setEditingBook(book);
  };

  useEffect(() => {
    localStorage.setItem("books", JSON.stringify(books));
  }, [books]);

  return (
    
    <div className="wrapper">
      <h1>BookList App</h1>
      <p>Add and view your books using local storage</p>
      <div className="main">
        <div className="form-container">
          <form
            autoComplete="off"
            className="form-group"
            onSubmit={handleAddOrUpdateBookSubmit}
          >
            <label>Title</label>
            <input
              type="text"
              className="form-control"
              required
              onChange={(e) => setTitle(e.target.value)}
              value={title}
            />
            <br />
            <label>Author</label>
            <input
              type="text"
              className="form-control"
              required
              onChange={(e) => setAuthor(e.target.value)}
              value={author}
            />
            <br />
            <label>ISBN#</label>
            <input
              type="text"
              className="form-control"
              required
              onChange={(e) => setIsbn(e.target.value)}
              value={isbn}
            />
            <br />
            <button type="submit" className="btn btn-success btn-md">
              {editingBook ? "Update" : "Add books Details"}
            </button>
          </form>
        </div>
        <div className="view-container">
          {books.length > 0 ? (
            <>
              <div className="table-responsive">
                <table className="table">
                  <thead>
                    <tr>
                      <th>ISBN#</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Delete</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <ViewList books={books} deleteBook={deleteBook} editBook={editBook} />
                  </tbody>
                </table>
              </div>
              <button
                className="btn btn-danger btn-md"
                onClick={() => setBooks([])}
              >
                Remove All
              </button>
            </>
          ) : (
            <div>No books are added yet</div>
          )}
        </div>
      </div>
      <footer className="about-footer">
        <p>&copy; 2024 Book List App. All rights reserved.</p>
      </footer>
      
    </div>
    
    
    
  );
  
};

export default Books;
