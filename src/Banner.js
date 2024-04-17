import { useNavigate } from 'react-router-dom';
import './App.css';

function Banner() {
  const navigate = useNavigate();

  const navigateToLogin = () => {
    navigate('/login');
  };

  const navigateToHome = () => {
    navigate('/');
  };

  return (
    <div className="banner">
      <h1 className="banner-title" onClick={navigateToHome} style={{ cursor: 'pointer' }}>UWW CompSci 366 Final</h1>
      <button className="login-button" onClick={navigateToLogin}>Log In</button>
    </div>
  );
}

export default Banner;
