import React, { Component } from "react";
import ChatHistory from "../chatHistory/ChatHistory";
import "./reply.scss";

class MessageReply extends Component {
    constructor() {
        super();
    }

    render() {
        return (
            <React.Fragment>
                <div
                    className="modal fade reply_modal_holder"
                    id="replyMsgModal"
                    tabIndex="-1"
                    role="dialog"
                    aria-labelledby="replyMsgModalLabel"
                    aria-hidden="true"
                >
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <div className="user_info">
                                    <p className="reply_title">Reply to:</p>
                                    <div className="user_photo">
                                        <img src="" />
                                    </div>
                                    <h4 className="user_name">Username</h4>
                                </div>
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
                                <ChatHistory />
                                <div className="msg_chat_ads">
                                    <span>
                                        <i className="far fa-images" />
                                    </span>
                                    <span>
                                        <i className="far fa-file" />
                                    </span>
                                </div>
                                <textarea />
                            </div>
                            <div className="modal-footer">
                                <button
                                    type="button"
                                    className="btn btn-primary"
                                >
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default MessageReply;
