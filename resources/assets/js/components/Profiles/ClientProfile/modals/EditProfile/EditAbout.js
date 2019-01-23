import React, { Component } from "react";
import { auth } from "../../../../../helpers";
 
import "./edit-profile.scss";

class EditAbout extends Component {
    constructor(props) {
        super(props);

        let { user } = this.props;

        this.state = {
          about: user.heading,
        };

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChangeAbout = this.handleChangeAbout.bind(this);
    }

    handleSubmit() {
        console.log("Submit");
        let data = {
          heading: this.state.about
        }
        console.log("Data for Submit: ", data);

        auth.post('client/update', data).then(res => {
            console.log("Update Basic Info success: ", res.data);
        }).catch(error => {
            console.log("Update Basic Info error: ", error.response);
        });
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
                    id="editAbout"
                >
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title">Update About Myself</h5>
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
                                  <textarea
                                      onChange={this.handleChangeAbout}
                                      defaultValue={user.heading}
                                      // placeholder={user.heading}
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

export default EditAbout;
