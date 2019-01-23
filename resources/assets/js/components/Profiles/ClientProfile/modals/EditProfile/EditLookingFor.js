import React, { Component } from "react";
import { auth } from "../../../../../helpers";
 
import "./edit-profile.scss";

class EditLookingFor extends Component {
    constructor(props) {
        super(props);

        let { user } = this.props;

        this.state = {
          about: user.about,
          looking_for: user.looking_for
        };

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChangeAbout = this.handleChangeAbout.bind(this);
        this.handleChangeLookingFor = this.handleChangeLookingFor.bind(this);
    }

    handleSubmit() {
        console.log("Submit");
        let data = {
          about: this.state.about,
          looking_for: this.state.looking_for
        }
        console.log("Data for Submit: ", data);

        auth.post('client/update', data).then(res => {
            console.log("Update Basic Info success: ", res.data);
        }).catch(error => {
            console.log("Update Basic Info error: ", error.response);
        });
    }

    handleChangeLookingFor(event) {
      this.setState({
        looking_for: event.target.value
      })
    }

    handleChangeAbout(event) {
        console.log(event.target.value);
        this.setState({
          about: event.target.value
        })
    }

    render() {
        let { user } = this.props;
        console.log("User: ", user.heading);
        return (
            <React.Fragment>
                <div
                    className="modal fade"
                    tabIndex="-1"
                    role="dialog"
                    id="editLookingFor"
                >
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title">Update about your ideal partner</h5>
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
                                  <div>I'm Looking for </div>
                                  <input type="radio" name="looking_for" value="Male" onChange={this.handleChangeLookingFor} defaultChecked={user.looking_for === "Male" ? true : false} /><span>Male</span>
                                  <input type="radio" name="looking_for" value="Female" onChange={this.handleChangeLookingFor} defaultChecked={user.looking_for === "Female" ? true : false} /><span>Female</span>
                              </div>
                              <div className="edit-row">
                                  <div>Some interesting details about your ideal partner</div>
                                  <textarea
                                      onChange={this.handleChangeAbout}
                                      defaultValue={user.about}
                                      //placeholder={user.heading}
                                      rows={7}
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

export default EditLookingFor;
