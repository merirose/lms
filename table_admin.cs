using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Abilms
{
    #region Table_admin
    public class Table_admin
    {
        #region Member Variables
        protected int _admin_id;
        protected string _admin_name;
        protected string _email;
        protected string _password;
        #endregion
        #region Constructors
        public Table_admin() { }
        public Table_admin(string admin_name, string email, string password)
        {
            this._admin_name=admin_name;
            this._email=email;
            this._password=password;
        }
        #endregion
        #region Public Properties
        public virtual int Admin_id
        {
            get {return _admin_id;}
            set {_admin_id=value;}
        }
        public virtual string Admin_name
        {
            get {return _admin_name;}
            set {_admin_name=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        #endregion
    }
    #endregion
}