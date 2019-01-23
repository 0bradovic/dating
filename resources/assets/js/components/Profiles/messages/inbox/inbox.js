import React, { Component } from "react";
import ReadMessage from "./ReadMessage/ReadMessage";
import { Redirect } from "react-router-dom";
import { connect } from "react-redux";
import "./inbox.scss";

class Inbox extends Component {
    constructor() {
        super();
        this.state = {
            modal: false
        };

        this.toggle = this.toggle.bind(this);
        this.handleModal = this.handleModal.bind(this);
    }

    toggle() {
        this.setState({
            modal: true
        });
    }

    handleModal() {
        this.setState({
            modal: false
        });
    }

    render() {
        let redirect = this.props.Redirect; // from redux reducer
        console.log("Redirect: ", redirect);
        
        return (
            <React.Fragment>
                <div className="content_1200">
                    {this.state.modal == true ? (
                        <ReadMessage handleModal={this.handleModal} />
                    ) : (
                        ""
                    )}

                    <div className="inbox_holder">
                        <nav className="inbox_nav">
                            <a href="">All</a>
                            <a href="">Unread</a>
                            <a href="">Read & Unanswered</a>
                        </nav>

                        <div className="inbox_messages_holder">
                            <div
                                onClick={this.toggle}
                                className="inbox_message"
                            >
                                <div className="user_info">
                                    <div className="user_photo">
                                        <img src="" />
                                    </div>
                                    <h4 className="user_name">Username</h4>
                                </div>

                                <div className="msg_excerpt">
                                    <p>
                                        It is like the magic, dear, my heart
                                        turns on the pink , the love color,
                                        darling, i want to drawn in the pink
                                        sea, darling...
                                    </p>
                                </div>

                                <div className="msg_date">
                                    <p>Dec 12, 11:13</p>
                                </div>

                                <div className="msg_option">
                                    <div className="dropdown">
                                        <button
                                            className="btn btn-secondary dropdown-toggle"
                                            type="button"
                                            id="dropdownMenuButton"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <span />
                                            <span />
                                            <span />
                                        </button>
                                        <div
                                            className="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton"
                                        >
                                            <a
                                                className="dropdown-item"
                                                href="#"
                                            >
                                                Delete
                                            </a>
                                            <a
                                                className="dropdown-item"
                                                href="#"
                                            >
                                                Block User
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                { redirect ? <Redirect to="/dashboard" /> : "" }
            </React.Fragment>
        );
    }
}

function mapStateToProps(state) {
    return state;
}

export default connect(mapStateToProps, null)(Inbox);
