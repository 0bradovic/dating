import React, { Component } from "react";
import { Link } from "react-router-dom";

class Sidebar extends Component {
    constructor(props) {
        super(props);
        this.state = {
            date: null,
            page: "home"
        };
    }

    tick(page) {
        this.setState({
            date: new Date(),
            page
        });
    }

    render() {
        return (
            <div className="Sidebar">
                <div className="Sidebar__logo">
                    <img src="https://via.placeholder.com/100x50" />
                </div>
                <div className="Sidebar__items">
                    <ul className="Siderbar__items_list">
                        <li className="Sidebar__items_list_item">
                            <Link to="/home" activeclassname="active">
                                <span onClick={() => this.tick("home")}>
                                    Home
                                </span>
                            </Link>
                        </li>
                        <li className="Sidebar__items_list_item">
                            <Link to="/test" activeclassname="active">
                                <span onClick={() => this.tick("test")}>
                                    Test
                                </span>
                            </Link>
                        </li>
                        <li className="Sidebar__items_list_item">Link 2</li>
                        <li className="Sidebar__items_list_item">Link 3</li>
                        <li className="Sidebar__items_list_item">Link 4</li>
                    </ul>
                </div>
            </div>
        );
    }
}

export default Sidebar;
