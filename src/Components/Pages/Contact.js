import React from "react";
import { NavLink, Outlet } from "react-router-dom";
import './Contact.css';

export default function Contact() {
  return (
    <div>
      <h1>Contact Page</h1>
      <button>
        <NavLink to="ContactUs">Call or mail US </NavLink>
      </button>
      <button>
        <NavLink to="Address">Drop a Letter </NavLink>
      </button>

       <Outlet /> 
    </div>
  );
}