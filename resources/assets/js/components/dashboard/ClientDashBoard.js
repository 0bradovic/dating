import React, { Component } from "react";
import { auth } from "../../helpers";
import DialogModel from "../registration/dialog";
import { connect } from "react-redux";
import { setAuth, setMultistep } from "../../Actions/Actions";
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from "reactstrap";
import "./dashboard.scss";

class ClientDashBoard extends Component {
    constructor(props) {
        super(props);
        this.state = {
            matches: [],
            user: "",
            modal: this.props.Multistep
        };

        this.toggle = this.toggle.bind(this);
        
        let from_register = localStorage.getItem("from_register");
        console.log(from_register);
        if ( from_register === "true" ) {
            localStorage.setItem("from_register", false);
            this.props.setMultistep(true);
        } else {
            this.props.setMultistep(false);
            console.log("Multistep status from wilmount: ", this.props.Multistep);
        }
    }

    toggle() {
        this.props.setMultistep(false);
    }

    componentWillMount() {

        auth.get("client/object")
            .then(res => {
                console.log("Client Auth Response: ", res.data);
                this.setState({
                    user: res.data
                });
            })
            .catch(error => {
                if (error.response.status === 401) {
                    this.props.setAuth(false);
                }
            });

        auth.get("client/employees/sixteen")
            .then(res => {
                console.log("Employees sixteen: ", res.data);
                this.setState({
                    matches: res.data
                });
            })
            .catch(error => {
                if (error.response.status === 401) {
                    
                }
            });
    }

    matches() {
        let searchEmloyeesResult = this.props.SearchEmployeesResult; //from redux reducer
        const matches = searchEmloyeesResult == null ? [...this.state.matches] : searchEmloyeesResult;
        let renderMatch = [];
        let matchItem;
        let baseUrl = window.location.origin;
        let imgSrc = "";
        for (let i = 0; i < matches.length; i++) {
            imgSrc = matches[i].employee_profile_photo != null && matches[i].employee_profile_photo != undefined ? baseUrl + matches[i].employee_profile_photo.url : 
            baseUrl + "/storage/employees/defaultphoto.jpeg";
            matchItem = (
                <div
                    key={matches[i].id}
                    id={matches[i].id}
                    className="col-3 matches_item"
                >
                    <a href="user-profile">
                        {/* <img src="../images/meet-bg.png" /> */}
                        <img src={imgSrc} />
                    </a>
                    <div className="matches_item_desc">
                        <h3>
                            {matches[i].nickname}
                            <span className="online_status">
                                Online
                                <span className="online" />
                            </span>
                        </h3>
                        {matches[i].heading.length > 65 ? (
                            <p>
                                {matches[i].heading.substring(0, 65) +
                                    "..."}
                            </p>
                        ) : (
                            matches[i].heading
                        )}
                    </div>
                </div>
            );
            renderMatch.push(matchItem);
        }

        return renderMatch;
    }

    render() {
        let multistep_status = this.props.Multistep;
        console.log("Multistep status: ", multistep_status);
        let searchResultMessage = this.props.SearchEmployeesResult != null && this.props.SearchEmployeesResult.length == 0 ? "No search result" : "";

        return (
            <div className="content_1200 site-content">
                <div className="row matches_dashboard">
                    {
                        this.matches().length > 0 ? this.matches() : <h4 className="search-message">{ searchResultMessage }</h4>
                    }
                </div>
                { this.props.Auth ?
                    <Modal
                        isOpen={this.props.Multistep}
                        toggle={this.toggle}
                        className="modal_client_info"
                    >
                        <ModalHeader>About You</ModalHeader>
                        <ModalBody>
                            <DialogModel user={this.state.user} />
                        </ModalBody>
                        <ModalFooter>
                            <Button color="primary" onClick={this.toggle}>
                                Do Something
                            </Button>{" "}
                            <Button color="secondary" onClick={this.toggle}>
                                Cancel
                            </Button>
                        </ModalFooter>
                    </Modal> : ""
                }
            </div>
        );
    }
}

function mapStateToProps(state) {
    return state;
}

export default connect(
    mapStateToProps,
    { setAuth, setMultistep }
)(ClientDashBoard);
