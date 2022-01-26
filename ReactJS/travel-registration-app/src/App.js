import { Route, Switch, Redirect } from "react-router-dom";

import './App.css';
import AddTourist from "./pages/AddTourist";
import ViewTourist from "./pages/ViewTourist";
import MainNavigation from "./components/layout/MainNavigation";

function App() {
  return (
    <div>
      <MainNavigation />
      <main>
        <Switch>
          <Route path = '/' exact>
            <Redirect to='/tourist'/>
          </Route>
          <Route path='/new-tourist' exact>
          <AddTourist />
        </Route>
        <Route path='/tourists/:touristId'>
          <ViewTourist />
        </Route>
      </Switch>
      </main>
    </div>
  );
}

export default App;
