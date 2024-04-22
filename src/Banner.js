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

  const navigateToTips = () => {
    navigate('/tips')
  };

  const navigateToDD = () => {
    navigate('/setData');
  };

  return (
    <div className="banner">
      <button className="set-DD" onClick= {navigateToDD}>Set Demographic Data</button>
      <button className="tips" onClick={navigateToTips}>Tips</button>
      <h1 className="banner-title" onClick={navigateToHome} style={{ cursor: 'pointer' }}>UWW CompSci 366 Final</h1>
      <button className="login-button" onClick={navigateToLogin}>Log In</button>
    </div>
  );
}

export default Banner;
