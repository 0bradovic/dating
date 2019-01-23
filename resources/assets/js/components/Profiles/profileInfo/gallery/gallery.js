import React, { Component } from "react";
import "./gallery.scss";

const galleryItemStyle = {
    background:
        "url(https://cdn.closeronline.co.uk/one/media/5ae7/0690/3331/4230/a869/e1a6/angelina-jolie-pretty-%20baby-girl-names-meaning.jpg?quality=50&width=900&ratio=1-1&resizeStyle=aspectfit&format=jpg)",
    backgroundSize: "cover",
    backgroundPosition: "center"
};

class Gallery extends Component {
    constructor(props) {
        super(props);
        this.state = {};

        this.handleProfileDataType = this.handleProfileDataType.bind(this);
    }

    handleProfileDataType(event) {
        let data_type = event.target.getAttribute('value');

        this.props.handleProfileDataType(data_type);
    }

    render() {
        return (
            <React.Fragment>
                <div className="row gallery_holder">
                    <div style={galleryItemStyle} className="col-6">
                        <div className="gallery_item_desc">
                            <div className="gallery_item_desc_content">
                                <p>My Photos</p>
                                <p>
                                    <i className="fas fa-camera" />
                                    <span>5</span>
                                </p>
                            </div>

                            <span value="profile_photos" className="show_gallery" onClick={this.handleProfileDataType}>Show</span>
                        </div>
                    </div>
                    <div style={galleryItemStyle} className="col-6">
                        <div className="gallery_item_desc">
                            <div className="gallery_item_desc_content">
                                <p>My Private Photos</p>
                                <p>
                                    <i className="fas fa-camera" />
                                    <span>3</span>
                                </p>
                            </div>

                            <span value="profile_private_photos" className="show_gallery" onClick={this.handleProfileDataType}>Show</span>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default Gallery;
