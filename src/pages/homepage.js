import React, { useState, useEffect } from 'react';
import './homepage.css'
import LineChart from './LineChart';
import logo from '../lotus.png';

function HomePage() {
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [userData] = useState([35, 39, 40, 41, 46]); // Simualted data

  useEffect(() => {
    if (isLoggedIn) {
      console.log("User Logged In");
    } else {
      console.log("User Logged Out");
    }
  }, [isLoggedIn]);

  const handleLoginCheckbox = (event) => {
      setIsLoggedIn(event.target.checked);
  };

  return (
      <div className="content-container">
          <header className="App-header">
              <img src={logo} alt="logo" style={{ width: '250px', height: '250px' }} />
              <h2>Anxiety and Depression Survey DBMS</h2>
              <h3>Group Members: Alex Sindorf, Martin Amundsen, Kaleb Johnson</h3>
          </header>
          <body>
              <section>
                  <h2>Title for Brief Explanation</h2>
                  <p>
                      Brief Explanation Brief Explanation Brief Explanation Brief Explanation
                      Brief Explanation Brief Explanation Brief Explanation Brief Explanation
                  </p>
              </section>
              
              {/* Checkbox to simulaate user login */}
              <div>
                  <label>
                      <input
                          type="checkbox"
                          checked={isLoggedIn}
                          onChange={handleLoginCheckbox}
                      />
                      Simulate Login
                  </label>
              </div>

              {isLoggedIn ? (
                  <>
                      <h2>My Activity Chart</h2>
                      <LineChart data={userData} />
                  </>
              ) : (
                  <p>Please log in to view your activity chart.</p>
              )}
          </body>
      </div>
  );
}
    export default HomePage;