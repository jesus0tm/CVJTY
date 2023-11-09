terminal=$(who | grep -i -m 1 $1 | awk '{print $2}')

echo $2 | write $logged $terminal

if [ -z $2 ]; then

        echo "Message not found"

        echo "Exit"

        exit

fi

