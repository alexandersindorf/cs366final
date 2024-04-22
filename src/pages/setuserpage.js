import { useNavigate } from 'react-router-dom';
import React, { useState } from 'react';
import './loginpage.css';

function SetUser() {

    const navigate = useNavigate();

    const navigateToLogin = () => {
      navigate('/login');
    };

  return (
    <div class="center">
      <h1>Set Account</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required/>
          <span></span>
          <label>Type Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required/>
          <span></span>
          <label>Type Password</label>
        </div>
        <div class="txt_field">
          <input type="password" required/>
          <span></span>
          <label>Confirm Password</label>
        </div>
        <p>Recovery Question:<br></br> What is your mother's maiden name?</p>
        <div class="txt_field">
          <input type="text" required/>
          <span></span>
          <label>Recovery Question Answer</label>
        </div>
            <input type="submit" value="Set Account"/>
      </form>
        <div class="signup_link">
          <a onClick={navigateToLogin}>Return to Login</a>
        </div>
    </div>
  );
}

export default SetUser;