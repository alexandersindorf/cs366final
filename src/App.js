import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import './App.css';
import Banner from './Banner';
import LoginPage from './pages/loginpage';
import HomePage from './pages/homepage';
import SetDataPage from './pages/setdatapage';
import TipPage from './pages/tippage';
import PasswordRecovery from './pages/passwordrecov';
import SetUser from './pages/setuserpage';
import QuizPage from './pages/quizpage';

function App() {
  return (
    <Router>
      <div className="App">
        <Banner /> {}
        <Routes>
          <Route exact path="/setData" element={<SetDataPage />} />
          <Route exact path="/" element={<HomePage />} />
          <Route exact path="/login" element={<LoginPage />} />
          <Route exact path="/tips" element={<TipPage />}/>
          <Route exact path="/pwRecovery" element={<PasswordRecovery />}/>
          <Route exact path="/setUser" element={<SetUser />}/>
          <Route exact path="/quiz" element={<QuizPage />}/>
        </Routes>
      </div>
    </Router>
  );
}

export default App;
