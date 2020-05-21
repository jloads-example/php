@ECHO OFF
echo I will check if any service, based on this project is active
netstat -ano|findstr "PID :8000"
