import './Navv.css';
import React from 'react';

import { Link } from 'react-router-dom';

function Navv() {
  return (
    <nav className="navbar">
    <ul className="navbar-nav">
      <li className="nav-item">
       
      <Link to="/" className="nav-link">Home</Link>
     
      </li>

      
      <li className="nav-item">
        <Link to="/about" className="nav-link">About</Link>
      </li>

      <li className="nav-item">
        <Link to="/books" className="nav-link">Book List</Link>
      </li>
      <li className="nav-item">
        <Link to="/contact" className="nav-link">
        
        Contact</Link>
      </li>
     
    </ul>
  </nav>
   
  );
}

export default Navv;
