import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import './App.css';
import Banner from './Banner';
import LoginPage from './pages/loginpage';
import HomePage from './pages/homepage';

function App() {
  return (
    <Router>
      <div className="App">
        <Banner /> {}
        <Routes>
          <Route exact path="/" element={<HomePage />} />
          <Route path="/login" element={<LoginPage />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
