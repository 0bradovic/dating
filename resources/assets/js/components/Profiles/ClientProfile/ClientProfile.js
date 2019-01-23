import React, { Component } from "react";
import { withRouter, Redirect } from "react-router-dom";
import { auth } from "../../../helpers";
//import "./client-profile.scss";
import ProfileInfo from "../profileInfo/profileInfo";
import PurchaseCred from "./modals/PurchaseCred/PurchaseCred";
import EditBasicInfo from "./modals/EditProfile/EditBasicInfo";
import EditProfilePhoto from "./modals/EditProfile/EditProfilePhoto";
import EditCoverPhoto from "./modals/EditProfile/EditCoverPhoto";
import EditPersonalInfo from "./modals/EditProfile/EditPersonalInfo";
import EditAbout from "./modals/EditProfile/EditAbout";
import EditInterests from "./modals/EditProfile/EditInterests";
import EditLookingFor from "./modals/EditProfile/EditLookingFor";
import { connect } from "react-redux";
import { setAuth, setClientPhotos } from "../../../Actions/Actions";
import axios from "axios";
import ProfilePhotos from "./ProfilePhotos";

class ClientProfile extends Component {
    constructor(props, context) {
        super(props, context);
        this.state = {
            user: "",
            user_photos: "",
            user_profile_photos: "",
            user_ages: "",
            allInterests: [],
            profile_data_type: "profile_info",
            //profile_data_type: "profile_photos",
            //profile_data_type: "profile_private_photos",
        };

        this.getClientAge = this.getClientAge.bind(this);
        this.getUser = this.getUser.bind(this);
        this.getAllInterests = this.getAllInterests.bind(this);
        this.drowProfileContent = this.drowProfileContent.bind(this);
        this.handleProfileDataType = this.handleProfileDataType.bind(this);
        
        this.getAllInterests();
    }

    componentDidMount() {}

    componentWillMount() {

        this.getUser();
        
    }

    async getUser() {
        await auth
            .get("client/object")
            .then(res => {
                console.log("Client Auth Response: ", res.data);
                this.setState({
                    user: res.data,
                    user_ages: this.getClientAge(res.data)
                });
                console.log("After set state");
            })
            .catch(error => {
                if (error.response.status === 401) {
                    this.props.setAuth(false);
                }
            });

        console.log("Client age: ", this.state.user_ages);
        console.log("Client ID: ", this.state.user.id);

        let data = {
            client_id: this.state.user.id
        };

        console.log("Data: ", data);

        await auth.post('client/photos/all', data).then(res => {
            console.log("Client All Photos Response: ", res.data);
            this.props.setClientPhotos(res.data); //smestam ga u reducer da bi mogao kasnije da izvrsim azuriranje nakon sto se odredjena slika obrise
            // this.setState({
            //     user_photos: res.data
            // })
        }).catch(error => {
            console.log("Error All Photos Response: ");
        })
    }

    getAllInterests() {
        auth.get('client/interests/all').then(res => {
            console.log("All interests response: ", res.data);
            this.setState({
                allInterests: res.data
            })
            console.log("All Interests state: ", this.state.allInterests);
        }).catch(error => {
            console.log("All interests error response: ", error.response);
        })
    }

    getClientAge(user) {
        let today = new Date();
        let current_year = today.getFullYear();

        let year = user.date_of_birth.split("-")[0];
        let client_ages = parseInt(current_year) - parseInt(year);

        return client_ages;
    }

    drowProfileContent() {
        let { user, profile_data_type } = this.state;

        console.log("profile_data_type:", profile_data_type);

        if ( profile_data_type == "profile_info" ) {
            return <ProfileInfo user={user} handleProfileDataType={this.handleProfileDataType} />
        } else if (profile_data_type == "profile_photos" || profile_data_type == "profile_private_photos") {
            return <ProfilePhotos user={user} handleProfileDataType={this.handleProfileDataType} profile_data_type={profile_data_type} photos={this.props.ClientPhotos} />
        }
    }

    handleProfileDataType(data_type) {
        this.setState({
            profile_data_type: data_type
        })
    }

    render() {
        let redirect = this.props.Redirect; // from redux reducer
        console.log("Redirect: ", redirect);

        let { user, user_photos, user_profile_photos, user_ages } = this.state;
        console.log("User:", user);
        console.log("User ages:", user_ages);

        let baseUrl = window.location.origin;
        let profilePhoto = "";
        let coverPhoto = "";

        if ( user !== undefined &&  user !== "" && user.profile_photo !== null && user.cover_photo !== null) {
            profilePhoto = baseUrl + user.profile_photo.url;
            coverPhoto = baseUrl + user.cover_photo.url;
        }

        return (
            <React.Fragment>
                <div className="content_1200">
                    <div className="col-12 client_profile_header">
                        <div className="card hovercard">
                            <div className="card-background">
                                <img
                                    className="card-bkimg"
                                    alt=""
                                    src={coverPhoto}
                                />
                                <span className="edit_photo" data-toggle="modal" data-target="#editCoverPhoto"><i className="fas fa-camera"></i></span>
                            </div>
                            <div className="useravatar">
                                {/* <img src="../images/riba.jpg" /> */}
                                <img src={profilePhoto} />
                                <span className="edit_photo" data-toggle="modal" data-target="#editProfilePhoto"><i className="fas fa-camera"></i></span>
                            </div>
                            <div className="card-info">
                                {" "}
                                <span className="card-title">
                                    {user.first_name + " " + user.last_name}
                                    {/* Sladja Medicinska Sestra, */}
                                    <span className="age">{user_ages}</span>
                                    <span
                                        className="edit_pen"
                                        data-toggle="modal"
                                        data-target="#editBasicInfo"
                                    >
                                        <i className="fas fa-edit" />
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div
                            className="btn-pref btn-group btn-group-justified btn-group-lg"
                            role="group"
                            aria-label="..."
                        />

                        <button
                            className="btn_refile_credits"
                            data-toggle="modal"
                            data-target="#purchaseCred"
                        >
                            {user.credit} Credits<span> / Purchase</span>
                        </button>
                    </div>

                    { this.drowProfileContent() }
                    {/* <ProfileInfo user={user} /> */}

                    { redirect ? <Redirect to="/dashboard" /> : "" }

                    {/* Modals */}
                    <PurchaseCred />
                    <EditBasicInfo user={user} />
                    <EditPersonalInfo user={user} />
                    <EditAbout user={user} />
                    <EditInterests allInterests={this.state.allInterests} user={user} />
                    <EditLookingFor user={user} />
                    <EditProfilePhoto user={user} />
                    <EditCoverPhoto user={user} />
                </div>
            </React.Fragment>
        );
    }
}

function mapStateToProps(state) {
    return state;
}

export default withRouter(connect(mapStateToProps, { setAuth, setClientPhotos })(ClientProfile));
