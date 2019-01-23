import React, { Component } from "react";
import { Route, Switch, withRouter } from "react-router-dom";
import Sidebar from "./Sidebar/Sidebar";
import Content from "./Content/Content";
import Test from "../components/Test/Test";
import ClientProfile from "../components/Profiles/ClientProfile/ClientProfile";


class Layout extends Component {
    constructor(props) {
        super(props);
        this.state = { state: "test" };
    }
    render() {
        return (
            // <div className="app_holder">
            //     <div className="app_holder_main">
            //         <Switch>
            //             <Route exact={true} path="/home" component={Content} />
            //             <Route exact={true} path="/test" component={Test} />
                    
            //         </Switch>
            //     </div>
            //     <div className="app_holder_sidebar">
            //         <Sidebar />
            //     </div>
            // </div>
            <main>
                <Switch>
                        <Route exact={true} path="/home" component={Content} />
                        <Route exact={true} path="/test" component={Test} />
                        <Route path="/client/profile/" component={ClientProfile} />
                </Switch>
               
            </main>
        );
    }
}

export default withRouter(Layout);
