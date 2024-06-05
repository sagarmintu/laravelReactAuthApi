import { AppBar, Box, Toolbar, Typography, Button } from "@mui/material";
import { NavLink } from "react-router-dom";

const Navbar = () => {
  return (
    <>
      <Box sx={{flexGrow:1}}>
        <AppBar position="static" color="success">
          <Toolbar>
            <Typography variant="h5" component="div" sx={{flexGrow:1}}>
              React Dashboard
            </Typography>
            <Button component={NavLink} to='/' sx={{color:'white'}} style={({ isActive }) =>{ return { backgroundColor:  isActive ?'#1890ff' : '' } }}>Home</Button>
            <Button component={NavLink} to='/contact' sx={{color:'white'}} style={({ isActive }) =>{ return { backgroundColor:  isActive ?'#1890ff' : '' } }}>Contact</Button>
          </Toolbar>
        </AppBar>
      </Box>
    </>
  )
}

export default Navbar;