import React, {Component} from 'react';
import Header from '../header/header';
import Footer from '../footer/footer';
class Home extends Component {
  constructor() {
    super();
    this.state = {
      isLoggedIn: false,
      user: {}
    }
  }
  // check if user is authenticated and storing authentication data as states if true
  componentWillMount() {
    let state = localStorage["appState"];
    if (state) {
      let AppState = JSON.parse(state);
      this.setState({ isLoggedIn: AppState.isLoggedIn, user: AppState.user });
    }
  }
render() {
    return (
      <div>
        <Header userData={this.state.user} userIsLoggedIn={this.state.isLoggedIn}/>
          <span>Whatever normally goes into the home/index page; A Plea To Heal The World for instance</span>
        <Footer/>
      </div>
      )
    }
  }
export default home