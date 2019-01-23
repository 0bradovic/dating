import React, { Component } from "react";
import moment from "moment";
import DatePicker from "react-datepicker";
import { auth } from "../../../../../helpers";
 
import "react-datepicker/dist/react-datepicker.css";
import "./edit-profile.scss";

class EditBasicInfo extends Component {
    constructor(props) {
        super(props);

        this.state = {
            firstName: this.props.user.first_name,
            lastName: this.props.user.last_name,
            birthday: moment()
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChangeFirstName = this.handleChangeFirstName.bind(this);
        this.handleChangeLastName = this.handleChangeLastName.bind(this);
    }

    handleSubmit() {
        console.log("Submit");
        let data = {
            first_name: this.state.firstName,
            last_name: this.state.lastName,
            date_of_birth: this.state.birthday
        }
        console.log("Data for Submit: ", data);

        auth.post('client/update', data).then(res => {
            console.log("Update Basic Info success: ", res.data);
        }).catch(error => {
            console.log("Update Basic Info error: ", error.response);
        });
    }

    handleChangeFirstName(event) {
        console.log("Change FirstName");
        this.setState({
            firstName: event.target.value
        })
    }

    handleChangeLastName(event) {
        console.log("Change LastName");
        this.setState({
            lastName: event.target.value
        })
    }

    handleChange(date) {
        this.setState({
            birthday: date
        });

        console.log("Update birthday: ", this.state.birthday);
    }

    render() {
        let { user } = this.props;
        return (
            <React.Fragment>
                <div
                    className="modal fade"
                    tabIndex="-1"
                    role="dialog"
                    id="editBasicInfo"
                >
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title">Update your basic information</h5>
                                <button
                                    type="button"
                                    className="close"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div className="modal-body">
                                <div className="edit-row">
                                    <span>First Name</span>
                                    <input type="text" defaultValue={user.first_name} onChange={this.handleChangeFirstName}/>
                                </div>
                                <div className="edit-row">
                                    <span>Last Name</span>
                                    <input type="text" defaultValue={user.last_name} onChange={this.handleChangeLastName}/>
                                </div>
                                <div className="edit-row">
                                    <span>Birthday</span>
                                    <DatePicker
                                        selected={this.state.birthday}
                                        onChange={this.handleChange}
                                    />
                                </div>
                            </div>
                            <div className="modal-footer">
                                <button
                                    type="button"
                                    className="btn btn-primary"
                                    onClick={this.handleSubmit}
                                >
                                    Submit
                                    </button>
                                <button
                                    type="button"
                                    className="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default EditBasicInfo;
