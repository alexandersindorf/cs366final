import { useNavigate } from 'react-router-dom';
import './loginpage.css';

function PasswordRecovery() {

  const navigate = useNavigate();

  const navigateToLogin = () => {
    navigate('/login');
  };

  return (
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login"/>
        <div class="signup_link">
          <button className="login-button" onClick={navigateToLogin}>Log In</button>
        </div>
      </form>
    </div>
  );
}

export default PasswordRecovery;