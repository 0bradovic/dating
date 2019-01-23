import React, { Component } from "react";
import { connect } from "react-redux";
import { setAuth, setMultistep } from "../../Actions/Actions";
import "./header.scss";
import Settings from "../Profiles/userProfile/ProfileSettings";

import SearchUser from "../Search/search";
class Header extends Component {
    constructor(props) {
        super(props);

        this.state = {};

        this.signOut = this.signOut.bind(this);
        this.showMultistep = this.showMultistep.bind(this);
    }

    signOut(event) {
        event.preventDefault();
        localStorage.removeItem("auth_token");
        localStorage.removeItem("user_id");
        this.props.setAuth(false);
        //location.reload();
    }

    showMultistep() {
        this.props.setMultistep(true);
    }

    render() {
        let current_path = window.location.pathname;

        return (
            <div className="header">
                <div className="content_1200">
                    <nav className="navbar navbar-expand-lg navbar-light">
                        <a className="navbar-brand" href="dashboard">
                            <img src="../images/logo.png" />
                        </a>

                        <button
                            className="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span className="navbar-toggler-icon" />
                        </button>

                        <div
                            className="collapse navbar-collapse"
                            id="navbarSupportedContent"
                        >
                            <ul className="navbar-nav ml-auto">
                                <li>
                                    <div className="dropdown search_dropdown_holder">
                                        <button
                                            className="btn btn-secondary dropdown-toggle search_dropdown_triger"
                                            type="button"
                                            id="searchDropDown"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            Search Your Match
                                        </button>
                                        <div
                                            id="searchDropDownMenu"
                                            className="dropdown-menu dropdown-menu-right "
                                            aria-labelledby="searchDropDown"
                                        >
                                            <SearchUser />
                                        </div>
                                    </div>
                                </li>
                                {current_path === "/dashboard" ? (
                                    <li className="nav-item">
                                        <button
                                            type="button"
                                            className="btn btn-primary update-profile"
                                            onClick={this.showMultistep}
                                        >
                                            Update profile
                                        </button>
                                    </li>
                                ) : (
                                    ""
                                )}

                                <li className="nav-item active">
                                    <a className="nav-link" href="dashboard">
                                        Home
                                        <span className="sr-only">
                                            (current)
                                        </span>
                                    </a>
                                </li>
                                <li className="nav-item">
                                    <a className="nav-link" href="inbox">
                                        Inbox
                                    </a>
                                </li>
                                <li className="nav-item dropdown">
                                    <a
                                        className="nav-link dropdown-toggle"
                                        href="#"
                                        id="navbarDropdown"
                                        role="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        User
                                    </a>
                                    <div
                                        className="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdown"
                                    >
                                        <a
                                            className="dropdown-item"
                                            href="my-profile"
                                        >
                                            My Profile
                                        </a>
                                        <a
                                            className="dropdown-item"
                                            data-toggle="modal"
                                            data-target="#SettingsModal"
                                        >
                                            Settings
                                        </a>{" "}
                                        <div className="dropdown-divider" />
                                        <a
                                            className="dropdown-item"
                                            onClick={this.signOut}
                                            href="#"
                                        >
                                            Sign Out
                                        </a>
                                    </div>
                                    <Settings />
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        );
    }
}

export default connect(
    null,
    { setAuth, setMultistep }
)(Header);
