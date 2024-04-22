import './homepage.css'
import logo from '../lotus.png';

function TipPage() {
  
    return (
<div className="content-container">
<header className="App-header">
<img src={logo} alt="logo" style={{ width: '250px', height: '250px' }} /> {}
    <h2>Anxiety and Depression Survey DBMS</h2>
    <h3>Group Members: Alex Sindorf, Martin Amundsen, Kaleb Johnson</h3>
    </header>
<body>
  <div>
    <section>
    <h2>Tips</h2>
    <p>
        TipsTipsTips
    </p>
  </section>

    </div>
    <section>
      <h2>Understanding Your Wellness Journey</h2>
      <p>
      Welcome to your personalized wellness dashboard! This radar chart is a dynamic tool designed to visualize your progress across key areas of well-being: Nutrition, Body, Mind, Social, and Sleep. It's more than just a chart; it's a reflection of your journey towards a balanced lifestyle. Each axis represents an essential component of wellness, and the plotted points illustrate your recent activities and efforts in these areas. By tracking your engagement and consistency, this chart offers a unique insight into how you're nurturing different aspects of your health. Use it as a guide to identify areas of strength and those needing more attention. Remember, every small step you take is a significant stride in your path to overall well-being. Let this chart be your companion in making mindful choices every day!
      </p>
    </section>
</body>
</div>
);
    }
    export default TipPage;