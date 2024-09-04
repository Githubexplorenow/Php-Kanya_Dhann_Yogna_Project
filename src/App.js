import React from 'react'
import "./App.css"
import Navv from './Components/Navv';
// import NavBarr from './Screen/Global/NavBarr'
import { Outlet } from "react-router-dom";





// import Books from './Components/Books';

function App() {
  return (
    <div> 
      <Navv/>
      {/* <Books/> */}
      
      
      
      
      <main>
   
        <Outlet/>
      </main>
     
      
      
      

    </div>
  )
}

export default App;