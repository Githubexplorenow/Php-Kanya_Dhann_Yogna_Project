
import React from "react";
import reportWebVitals from "./reportWebVitals";
import ReactDOM from "react-dom/client";
import {
  createBrowserRouter,
  createRoutesFromElements,
  Route,
  RouterProvider,
} from "react-router-dom";

//Pages

import Home  from "./Components/Pages/Home";

import About from "./Components/Pages/About";
import Books from "./Components/Books";
import Product from "./Components/Pages/Product";
import ProductDetails from "./Components/Pages/About";
import Contact from "./Components/Pages/Contact";
import Address from "./Components/Address";
import ContactUs from "./Components/Pages/ContactUs";
import NoPage from "./Components/Pages/NoPage";
import App from "./App";
// import Product from "./Pages/Product";
// import ProductDetails from "./Pages/ProductDetails";
//Components
// import Address from "./Components/Address";
// import ContactUs from "./Components/ContactUs";



const router = createBrowserRouter(
  createRoutesFromElements(
    <Route path="/" element={<App />}>
      <Route index element={<Home />} />

      
      <Route path="About" element={<About />} />
      <Route path="Books" element={<Books/>}/>
      <Route path="Product" element={<Product />} >
      <Route path="ProductDetails"element={<ProductDetails />}/>
      
      
      </Route> 
      <Route path="Contact" element={<Contact />}>

     
     
        <Route path="Address" element={<Address />} />
        <Route path="ContactUs" element={<ContactUs />} />
      </Route>

      <Route path="*" element={<NoPage />} />

      {/* <Route path="*" element={<div>404 Page not Found</div>} /> */}
    </Route>
  )
);

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();