import React, { Component } from "react";
import axios from "axios";
import {
    BrowserRouter as Router,
    Route,
    Switch,
    Link,
    Redirect
} from "react-router-dom";
import { connect } from 'react-redux';

import Header from "./components/header/header";
import Footer from "./components/footer/footer";
import ClientProfile from "./components/Profiles/ClientProfile/ClientProfile";
import ClientDashBoard from "./components/dashboard/ClientDashBoard";
import userProfile from "./components/Profiles/userProfile/userProfile";
import Modal from "./components/Modal/Modal";
// import Settings from "./components/Profiles/userProfile/ProfileSettings";
import Inbox from "./components/Profiles/messages/inbox/inbox";
// import EmailTemplate from "./components/email/emailtemplate"
import ShoppingCarts from "./components/shopping/shoppingcarts";

class App extends Component {
    constructor() {
        super();
        this.logout = this.logout.bind(this);
    }

    componentWillMount() {}

    logout() {
        axios.get("client/logout").then(res => {
            console.log("succ");

            //localStorage.removeItem("auth_token");
        });
    }

    render() {
        //let redirect = this.props.Redirect; // from redux reducer
        //console.log("Redirect: ", redirect);
        return (
            <React.Fragment>
                <Header />
                <Router>
                    <Switch>
                        <Route
                            path="/"
                            exact
                            render={() => <Redirect to="/dashboard" />}
                        />
                        <Route
                            path="/dashboard"
                            exact
                            component={ClientDashBoard}
                        />
                        <Route 
                            path="/my-profile" 
                            component={ClientProfile}
                        />
                        <Route path="/user-profile" component={userProfile} />
                        {/* <Route path="/settings" component={Settings} /> */}
                        <Route path="/inbox" component={Inbox} />
                        <Route path="/shopping" component={ShoppingCarts} />
                    </Switch>
                </Router>
                <Footer />
                <Modal />
            </React.Fragment>
        );
    }
}

function mapStateToProps(state) {
    return state;
}

export default connect(mapStateToProps, null)(App);
