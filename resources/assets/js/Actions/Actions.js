export const SET_AUTH = 'SET_AUTH';
export const SET_MULTISTEP = 'SET_MULTISTEP';
export const SET_SEARCH_EMPLOYEES_RESULT = 'SET_SEARCH_EMPLOYEES_RESULT';
export const SET_REDIRECT = 'SET_REDIRECT';
export const SET_CLIENT_PHOTOS = 'SET_CLIENT_PHOTOS';

export function setAuth(status) {
  return {
    type: SET_AUTH,
    status
  }
}

export function setMultistep(status) {
  return {
    type: SET_MULTISTEP,
    status
  }
}

export function setSearchEmployeesResult(employees) {
  return {
    type: SET_SEARCH_EMPLOYEES_RESULT,
    employees
  }
}

export function setRedirect(status) {
  return {
    type: SET_REDIRECT,
    status
  }
}

export function setClientPhotos(photos) {
  return {
    type: SET_CLIENT_PHOTOS,
    photos
  }
}

