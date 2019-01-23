import React, { Component } from "react";
import { Redirect } from "react-router-dom";
import "./user-profile.scss";
import ProfileInfo from "../profileInfo/profileInfo";
import SimularMatch from "../../SimularMatch/SimularMatch";
import { connect } from "react-redux";

class userProfile extends Component {
    constructor(props, context) {
        super(props, context);
        this.state = {};
    }

    render() {
        let redirect = this.props.Redirect; // from redux reducer
        console.log("Redirect: ", redirect);

        return (
            <React.Fragment>
                <div className="content_1200">
                    <div className="col-12 client_profile_header">
                        <div className="card hovercard">
                            <div className="card-background">
                                <img
                                    className="card-bkimg"
                                    alt=""
                                    src="../images/purple-cover.png"
                                />
                            </div>
                            <div className="useravatar">
                                <img src="../images/riba.jpg" />
                            </div>
                            <div className="card-info">
                                {" "}
                                <span className="card-title">
                                    Sladja Medicinska Sestra,
                                    <span className="age">24</span>
                                    <span className="online_status">
                                        / Online
                                        <span className="online" />
                                    </span>
                                </span>
                            </div>

                            <div className="call_user_to_action">
                                <button className="msg">
                                    <i className="fas fa-envelope" /> Message
                                </button>
                                <button className="chat">
                                    <i className="fas fa-comments" /> Chat
                                </button>
                                <button className="call">
                                    <i className="fas fa-microphone" /> Call
                                </button>
                                <button className="cam">
                                    <i className="fas fa-video" /> Camera
                                </button>
                                <button className="share_cam">
                                    <i className="fas fa-user-friends" /> Share
                                    Camera
                                </button>
                            </div>

                            <button className="show_gallery">Galley</button>
                        </div>

                        <div
                            className="btn-pref btn-group btn-group-justified btn-group-lg"
                            role="group"
                            aria-label="..."
                        />
                    </div>

                    { redirect ? <Redirect to="/dashboard" /> : "" }
                    
                    {/* <ProfileInfo /> */}
                    <SimularMatch />
                </div>
            </React.Fragment>
        );
    }
}

function mapStateToProps(state) {
    return state;
}


export default connect(mapStateToProps, null)(userProfile);
