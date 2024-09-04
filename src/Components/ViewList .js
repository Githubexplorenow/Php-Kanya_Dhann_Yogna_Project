import React from "react";
import { Icon } from "react-icons-kit";
import { trash } from "react-icons-kit/feather/trash";
import { edit } from "react-icons-kit/feather/edit";
const iconStyle = {
  fontSize: '20px', // Adjust size as needed
};

const deleteIconStyle = {
  ...iconStyle,
  color: '#ff0000', // Red color for delete icon
};

const editIconStyle = {
  ...iconStyle,
  color: '#00ff00', // Green color for edit icon
};

export const ViewList = ({ books, deleteBook, editBook }) => {
  return books.map((book) => (
    <tr key={book.isbn}>
      <td>{book.isbn}</td>
      <td>{book.title}</td>
      <td>{book.author}</td>
      <td className="delete-btn" onClick={() => deleteBook(book.isbn)}>
        <Icon icon={trash} style={deleteIconStyle} />
      </td>
      <td className="edit-btn" onClick={() => editBook(book)}>
        <Icon icon={edit} style={editIconStyle} />
      </td>
    </tr>
  ));
};
