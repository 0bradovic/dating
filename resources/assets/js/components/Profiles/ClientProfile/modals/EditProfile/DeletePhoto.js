import React, { Component } from 'react';
import { auth } from "../../../../../helpers";
import { connect } from "react-redux";
import { setClientPhotos } from "../../../../../Actions/Actions";

class DeletePhoto extends Component {
  constructor(props) {
    super(props);

    this.deletePhoto = this.deletePhoto.bind(this);
  }

  async deletePhoto() {
    console.log("Delete photo ID: ", this.props.deletePhotoId);

    let data = {
      id: this.props.deletePhotoId
    }

    console.log("Data: ", data);

    await auth.post('client/delete/photos', data).then(res => {
        console.log("Delete photo: ", res.data)
        //this.props.setClientPhotos(res.data); //smestam ga u reducer da bi mogao kasnije da izvrsim azuriranje nakon sto se odredjena slika obrise
        // this.setState({
        //     user_photos: res.data
        // })
    }).catch(error => {
        console.log("Error Delete Photo Response: ", error.response.data);
    })

    document.getElementById("deletePhotoClose").click();
    
    data = {
      client_id: this.props.user.id
    }

    await auth.post('client/photos/all', data).then(res => {
      console.log("Client All Photos After Delete Response: ", res.data);
      this.props.setClientPhotos(res.data);
    }).catch(error => {
        console.log("Error All Photos Response: ", error.response);
    })

  }
  
  render() { 

    return ( 
      <React.Fragment>
        <div
          className="modal fade delete-photo"
          tabIndex="-1"
          role="dialog"
          id="deletePhoto"
        >
          <div className="modal-dialog" role="document">
            <div className="modal-content">
                <div className="modal-header">
                    <h5 className="modal-title">Are you sure to remove this photo?</h5>
                    <button
                        type="button"
                        className="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        id="deletePhotoClose"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div className="modal-body">
                  <button
                      type="button"
                      className="btn btn-primary"
                      onClick={this.deletePhoto}
                  >
                      Yes
                      </button>
                  <button
                      type="button"
                      className="btn btn-secondary"
                      data-dismiss="modal"
                  >
                      No
                  </button>
                  
                </div>
            </div>
          </div>
        </div>

      </React.Fragment>
    );
  }
}
 
export default connect(null, { setClientPhotos })(DeletePhoto);