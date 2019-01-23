import React, { Component } from "react";
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from "reactstrap";
import ReplyMessage from "../../reply/reply.js";
import "./ReadMessage.scss";

class ReadMessage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            modal: true
        };

        this.toggle = this.toggle.bind(this);
    }

    toggle() {
        this.setState({
            modal: !this.state.modal
        });
    }

    render() {
        return (
            <React.Fragment>
                <Modal
                    isOpen={this.state.modal}
                    toggle={this.props.handleModal}
                    className="read_msg_modal"
                >
                    <ModalHeader toggle={this.props.handleModal}>
                        <div className="user_info">
                            <div className="user_photo">
                                <img src="" />
                            </div>
                            <h4 className="user_name">Username</h4>
                        </div>
                    </ModalHeader>
                    <ModalBody>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.
                    </ModalBody>
                    <ModalFooter>
                        <button
                            onClick={this.props.handleModal}
                            className="btn btn-primary"
                            type="button"
                            data-toggle="modal"
                            data-target="#replyMsgModal"
                        >
                            Reply
                        </button>
                        <Button
                            color="secondary"
                            onClick={this.props.handleModal}
                        >
                            Close
                        </Button>
                    </ModalFooter>
                </Modal>

                <ReplyMessage />
            </React.Fragment>
        );
    }
}

export default ReadMessage;
