import React, { Component } from "react";
import "./profile-info.scss";
import EditProfile from "../ClientProfile/modals/EditProfile/EditProfile";
//import "./profile-info.scss";
import Gallery from "./gallery/gallery";

class ProfileInfo extends Component {
    constructor(props, context) {
        super(props, context);
        this.state = {};

        this.interestsList = this.interestsList.bind(this);
    }

    interestsList() {
        let userInterests = this.props.user.interests;
        let interestsList = [];

        if (userInterests !== undefined) {
            userInterests.map(item => {
                interestsList = [
                    ...interestsList,
                    <button key={item.id} className="books">
                        {item.name}
                    </button>
                ];
            });
        }

        return interestsList;
    }

    render() {
        let { user } = this.props;
        console.log(user);
        let baseUrl = window.location.origin;
        console.log("Base Url: ", baseUrl);
        let profilePhoto = "";
        let coverPhoto = "";
        if (
            user !== undefined &&
            user !== "" &&
            user.profile_photo !== null &&
            user.cover_photo !== null
        ) {
            profilePhoto = baseUrl + user.profile_photo.url;
            coverPhoto = baseUrl + user.cover_photo.url;
        }

        console.log("Profile photo: ", profilePhoto);
        return (
            <React.Fragment>
                <div className="profile_info">
                    <div className="about_me">
                        <h3>A Few Words About Myself</h3>
                        <p>{user.heading}</p>
                        <span
                            className="edit_pen edit_pen_button"
                            data-toggle="modal"
                            data-target="#editAbout"
                        >
                            <i className="fas fa-edit" />
                        </span>
                    </div>

                    <Gallery
                        handleProfileDataType={this.props.handleProfileDataType}
                    />

                    <div className="row profile_info_holder">
                        <div className="col-4 interests">
                            <h3>My Interests</h3>

                            {this.interestsList()}

                            <span
                                className="edit_pen edit_pen_button"
                                data-toggle="modal"
                                data-target="#editInterests"
                            >
                                <i className="fas fa-edit" />
                            </span>
                        </div>

                        <div className="col-4 about_me">
                            <h3>About Me</h3>
                            <p>
                                From:{" "}
                                <span>
                                    {user.country}, {user.city}
                                </span>
                            </p>
                            <p>
                                Languages: <span>{user.language}</span>
                            </p>
                            <p>
                                Relationship: <span>{user.relationship}</span>
                            </p>
                            <p>
                                Have kids: <span>{user.children}</span>
                            </p>
                            <p>
                                Height: <span>{user.height} cm</span>
                            </p>
                            <p>
                                Eyes: <span>{user.eye_color}</span>
                            </p>
                            <p>
                                Hair: <span>{user.hair_color}</span>
                            </p>

                            <span
                                className="edit_pen edit_pen_button"
                                data-toggle="modal"
                                data-target="#editPersonalInfo"
                            >
                                <i className="fas fa-edit" />
                            </span>
                        </div>

                        <div className="col-4 looking_for">
                            <h3>I'm Looking for</h3>
                            <h4>{user.looking_for}</h4>
                            <p>{user.about}</p>

                            <span
                                className="edit_pen edit_pen_button"
                                data-toggle="modal"
                                data-target="#editLookingFor"
                            >
                                <i className="fas fa-edit" />
                            </span>
                        </div>
                    </div>
                </div>

                {/* Modals */}
                <EditProfile />
            </React.Fragment>
        );
    }
}

export default ProfileInfo;
