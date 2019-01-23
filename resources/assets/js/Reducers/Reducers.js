import { SET_AUTH, SET_MULTISTEP, SET_SEARCH_EMPLOYEES_RESULT, SET_REDIRECT, SET_CLIENT_PHOTOS } from '../Actions/Actions';
import { combineReducers } from 'redux';

function Auth(state = true, action) {
  switch(action.type) {
    case SET_AUTH:
      return action.status;
    default:
      return state;
  }
}

function Multistep(state = false, action) {
  switch(action.type) {
    case SET_MULTISTEP:
      return action.status;
    default:
      return state;
  }
}

function SearchEmployeesResult(state = null, action) {
  switch(action.type) {
    case SET_SEARCH_EMPLOYEES_RESULT:
      return action.employees;
    default:
      return state;
  }
}

function Redirect(state = false, action) {
  switch(action.type) {
    case SET_REDIRECT:
      return action.status;
    default:
      return state;
  }
}

function ClientPhotos(state = [], action) {
  switch(action.type) {
    case SET_CLIENT_PHOTOS:
      return action.photos;
    default:
      return state;
  }
}

const rootReducer = combineReducers({ Auth, Multistep, SearchEmployeesResult, Redirect, ClientPhotos })

export default rootReducer;