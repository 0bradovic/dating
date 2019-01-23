import React, { Component } from 'react';
import { auth } from "../../../../../helpers";
import Avatar from "react-avatar-edit";

class EditProfilePhoto extends Component {
  
  constructor(props) {
    super(props);

    let baseUrl = window.location.origin;
    //let profilePhoto = user.profile_photo !== null && user.profile_photo !== undefined ? user.profile_photo.url : "";
    //let cropped_url = profilePhoto.indexOf("data") === 0 ? profilePhoto : baseUrl + profilePhoto;

    this.state = {
      preview: "",
    };
    this.onCrop = this.onCrop.bind(this);
    this.onClose = this.onClose.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  onClose() {
      this.setState({ preview: null });
  }

  onCrop(preview) {
      this.setState({ preview });
      console.log(preview);
      //this.props.handlerProfilePhoto(preview);
  }
  
  handleSubmit() {
      let data = {
        profile_photo: this.state.preview
      }
      console.log("Data for Submit: ", data);

      auth.post('client/update', data).then(res => {
          console.log("Update Profile Photo: ", res.data);
      }).catch(error => {
          console.log("Update Profile Photo error: ", error.response);
      });
  }

  render() { 
    return ( 
      <React.Fragment>
          <div
              className="modal fade"
              tabIndex="-1"
              role="dialog"
              id="editProfilePhoto"
          >
              <div className="modal-dialog" role="document">
                  <div className="modal-content">
                      <div className="modal-header">
                          <h5 className="modal-title">Update your profile photo</h5>
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
                        
                      <div className="avatar-upload">
                        <Avatar
                            width={300}
                            height={200}
                            imageWidth={300}
                            borderStyle={"2px double rgb(151, 151, 151)"}
                            onCrop={this.onCrop}
                            onClose={this.onClose}
                            src={this.state.src}
                            cropRadius={0}
                        />
                        <img src={this.state.preview} 
                            // onChange={this.profileUpload}
                        alt="Preview" />
                          
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
 
export default EditProfilePhoto;