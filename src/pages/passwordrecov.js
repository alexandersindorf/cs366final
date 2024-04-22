import { useNavigate } from 'react-router-dom';
import './loginpage.css';

function PasswordRecovery() {

  const navigate = useNavigate();

  const navigateToLogin = () => {
    navigate('/login');
  };

  return (
    <div class="center">
      <h1>Password Recovery</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required/>
          <span></span>
          <label>Password Question Answer</label>
        </div>

        <h2>Password: </h2><h2 id = "recovered"></h2>

        <input type="submit" value="Get Password"/>
        <div class="signup_link">
          <a onClick={navigateToLogin}>Log In</a>
        </div>
      </form>
    </div>
  );
}

export default PasswordRecovery;