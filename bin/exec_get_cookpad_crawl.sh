cid=100000
time=10000
end_id=`expr $cid + $time`
cmd='php ../script/get_cookpad_data.php'

while :
do 
    $cmd $cid
    sleep 30s 
    cid=`expr $cid + 1`
    
    if [ $cid -gt $end_id ]; then
        break
    fi
done
